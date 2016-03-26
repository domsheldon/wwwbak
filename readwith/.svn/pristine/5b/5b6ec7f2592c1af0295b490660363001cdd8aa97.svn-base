<?php
/**
* 书籍相关业务
* @date: 2015-12-24
* @author: efan
* @version:1.0.0
*/
import('@.Model.BookModel');
class BookService {
	
	/**
	 * 用户提交书籍的页码
	 */
	public function saveBookPages($user_id,$book_id,$pages) {
		$book_info=M('Book')->field('title,isbn')->where('book_id='.$book_id)->find();
		$data = array(
			'user_id' => $user_id,
			'book_id' => $book_id,
			'book_title' => $book_info['title'],
			'isbn' => $book_info['isbn'],
			'pages' => $pages,
			'create_time' => date('Y-m-d H:i:s'),
		);
		M('BookPages')->add($data);
		M('Book')->where('book_id='.$book_id)->setField('pages',$pages);
	}
	
	/**
	* 获取书籍短评
	* @param $task_id 
	* @param $book_id 
	* @date 2015-12-29
	* @return:
	*/
	public function getBookReview($task_id, $book_id) {
		$sql="SELECT content FROM `ys_douban_review` a
WHERE  NOT EXISTS
(SELECT 1 FROM `ys_task_digest` b WHERE a.id=b.`review_id` AND b.task_id = $task_id AND a.book_id = $book_id)";
		
		$info=M()->query($sql);
		return $this->return_info($info[0]['content'], $info);
	}
	
	//返回信息
    private function return_info($bool, $info) {
        return array(
            0 => $bool,
            1 => $info
        );
    }

	/**
	 * 书籍信息列表
	 */
	public function getBookList() {
		$model = new BookModel();
		$res = $model->getBookList();
		return $res;
	}
}