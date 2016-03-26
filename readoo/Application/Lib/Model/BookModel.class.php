<?php
/**
* 有书的书籍model
* @date: 2015-1-29
* @author: efan
* @version:1.0.0
*/
class BookModel extends Model {
	
	private $user_love_count=10;//每个用户只能设置10本书最爱
	public static $love_sort=99;


	/**
	* 根据书名从豆瓣搜索一本书
	* @param string $book_title 
	* @param int $count 搜索几本 
	* @date 2015-9-7
	* @return:$book_id
	*/
	public function douban_search($book_title,$count='1') {
		//先检查是否存在此书
		$book_id=M('Book')->where('title="'.$book_title.'"')->getField('book_id');
		if ($book_id) {
			return $book_id;
		}
		$url='https://api.douban.com/v2/book/search?q='.$book_title.'&count=1';
		$data=CommonModel::curl_get($url);
		$data_arr=json_decode($data,true);
		$result=$data_arr['books'][0];
		$book_id=$this->save_book_info($result['title'], $result['author'][0], $result['image'], $result['isbn13'], $result['price'], $result['publisher'], $result['summary'],$result['images']['large'],$result['pages'],$result['rating']['average'],$result['pubdate'],$result['binding'],$result['tags']);
		return $book_id;
	}
	/**
	* 根据isbn从豆瓣搜索一本书
	* @param string $isbn 13位的
	* @date 2016-3-2
	* @return
	* Array
	(
    [rating] => Array
        (
            [max] => 10
            [numRaters] => 1958
            [average] => 8.7
            [min] => 0
        )
    [subtitle] => 普及本
    [author] => Array
        (
            [0] => 路遥
        )
    [pubdate] => 2011-9-1
    [tags] => Array
        (
            [0] => Array
                (
                    [count] => 708
                    [name] => 平凡的世界
                    [title] => 平凡的世界
                )
        )
    [origin_title] => 
    [image] => https://img1.doubanio.com/mpic/s28051284.jpg
    [binding] => 平装
    [translator] => Array
        (
        )
    [catalog] => 
    [pages] => 452
    [images] => Array
        (
            [small] => https://img1.doubanio.com/spic/s28051284.jpg
            [large] => https://img1.doubanio.com/lpic/s28051284.jpg
            [medium] => https://img1.doubanio.com/mpic/s28051284.jpg
        )
    [alt] => http://book.douban.com/subject/6835758/
    [id] => 6835758
    [publisher] => 北京出版集团公司,十月文艺出版社
    [isbn10] => 7530211269
    [isbn13] => 9787530211267
    [title] => 平凡的世界
    [url] => http://api.douban.com/v2/book/6835758
    [alt_title] => 
    [author_intro] => 
    [summary] => 平凡的世界（普及本），ISBN：9787530211267，作者：路遥 著
    [price] => 28.00元
	)
	*/
	public function douban_isbn_find($isbn){
		$url='https://api.douban.com/v2/book/isbn/'.$isbn;
		$data=CommonModel::curl_get($url);
		
		$result=json_decode($data,true);
		return $result;
	}
	/**
	 * 保存书籍信息
	 * @param  $title 书名
	 * @param  $author 作者
	 * @param  $cover 豆瓣的封面地址(直接是豆瓣的封面地址，没有保存)
	 * @param  $isbn isbn13
	 * @param  $price 价格
	 * @param  $publisher 出版社
	 * @param  $intro 简介
	 * @param  $large_url 大图地址
	 * @param  $pages 总页数
	 * @param  $score 评分
	 * @param  $pubdate 出版日期
	 * @param  $binding 精装或简装
	 * @param  $tag_arr 豆瓣的标签数组(包含豆瓣的count)
	 */
	public function save_book_info($title,$author,$cover,$isbn,$price,$publisher,$intro,$large_url='',$pages='',$score='',$pubdate='',$binding='',$douban_id) {
		//检查下是否有此书
		$book=M('Book');
		$book_id=$book->where('isbn13="'.$isbn.'"')->getField('book_id');
		//为了兼容1.7版之前的接口没有存储这个3个字段，需要把这3个字段重新保存
		if (isset($large_url)){
			$book_data['large_cover']=$large_url;
		}
		if ($pages){
			$book_data['pages']		=$pages;
		}
		if (isset($pubdate)){
			$book_data['pubdate']	=$pubdate;//出版日期
		}
		if (isset($score)){
			$book_data['score']		=$score;//评分
		}
		if(empty($book_id)){
			$book_data['title']		=$title;
			$book_data['search_title']=ChineseToPinyin($title,'UTF-8');
			$book_data['author']	=$author;
			$book_data['search_author']=ChineseToPinyin($author,'UTF-8');
			$book_data['cover']		=$cover;
			$book_data['isbn13']	=$isbn;
			$book_data['price']		=trim($price);
			$book_data['publisher'] =trim($publisher);
			$book_data['binding']	=$binding;//简装版
			$book_data['douban_id']	=$douban_id;
			$book_data['intro']		=$intro;
			$book_data['is_curl']	=0;//是否采集了图片
			$book_data['create_time']=time();
			
			$book_id=$book->add($book_data);
		} else {
			$book->where('book_id='.$book_id)->save($book_data);
		}
		return $book_id;
	}
	/**
	* 书籍详情页
	* @param int book_id 
	* @return:
	*/
	public function get_book_info($book_id) {
		//详情信息
		return M('Book')->field('book_id,title,author,cover,intro,score,pubdate,publisher,isbn13 as isbn')->where('book_id='.$book_id)->find();
//		$model = M('Book');
//		$res = $model->field('book_id,title,author,cover,intro,score,pubdate,publisher,isbn13 as isbn')->where('book_id='.$book_id)->find();
	}
	/**
	* 获取书籍的字段
	* @param $book_id 
	* @param $field 要获取的字段
	* @date 2015-12-21
	* @return:
	*/
	public function getBookField($book_id, $field) {
		return M('Book')->where('book_id='.$book_id)->getField($field);
	}
	/**
	* 更新book表的字段
	* @param $book_id 
	* @param $field 
	* @param $value 
	* @date 2015-12-21
	* @return:
	*/
	public function setBookField($book_id, $field, $value) {
		M('Book')->where('book_id='.$book_id)->setField($field, $value);
	}
	/**
	 * 更新book表的字段
	 * @param $book_id
	 * @param $pages
	 * @return:
	 */
	public function updateBookPages($book_id, $pages) {
		$sql = "UPDATE ys_book SET pages = '".$pages."' WHERE book_id = '".$book_id."'";
		$model = M();
		return $model->query($sql);
	}

	/**
	 * 书籍信息首页
	 * @return:
	 */
	public function getBookList() {
		$model = M('Book');
		$res = $model->field('book_id,title,author,cover,isbn13,create_time')->select();
		return $res;
	}

	/**
	 * 查询book表里是否存在传入的isbn书籍
	 * @return:
	 */
	public function isbnIsExist($isbn) {
		return  M('Book')->field('book_id,title,author,cover,intro')->where("isbn13 = '".$isbn."'")->find();
	}

	/**
	 * 查找书名选择书籍
	 */
	public function choosebook($book_title) {
		$model = M('Book');
		$res = $model->field('book_id,title,author,cover,isbn13')->where("title LIKE '%".$book_title."%'")->order('book_id')->select();
		if (empty($res)) {
			$book_id=$this->douban_search($book_title);
			$res=$model->field('book_id,title,author,cover,isbn13')->where('book_id='.$book_id)->select();
		}
		return $res;
	}

	/**
	 * 查找book_id选择书籍
	 */
	public function getBookFromId($bookId) {
		$model = M('Book');
		$res = $model->field('book_id,title,author,cover,isbn13')->where("book_id = '".$bookId."'")->limit(1)->select();
		return $res;
	}
}