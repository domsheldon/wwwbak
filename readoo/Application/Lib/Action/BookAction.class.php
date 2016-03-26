<?php
/**
* 
* @date: 2015-1-29
* @author: efan
* @version:1.0.0
*/
import('@.Service.CheckService');
import('@.Service.BookService');
class BookAction extends WebCommonAction {
	
	private $check;
	private $book;
	private $version;
	
	public function __construct() {
		parent::__construct();
		$this->check=new CheckService($this->uid);
		$this->book=new BookModel();
	}
	
	//把用户扫描的书加入在读列表
	public function book_save() {
		$book=new BookModel();
		$task=new TaskModel();
		
		$title	=$this->_post('title');
		$author	=$this->_post('author');
		$cover	=$this->_post('cover');
		$isbn	=$this->_post('isbn');
		$price	=(int)$this->_post('price');
		$publisher=$this->_post('publisher');
		$intro	=$this->_post('intro');
		$large_url=$this->_post('large');
		$pages	=$this->_post('pages');
		$score	=$this->_post('score');
		$pubdate=$this->_post('pubdate');
		$douban_id=$this->_post('douban_id');
		$binding=trim($this->_post('binding'));

		//保存书籍信息
		$book_id=$book->save_book_info($title, $author, $cover, $isbn, $price, $publisher, $intro, $large_url, $pages, $score, $pubdate, $binding, $douban_id);
		
		if($book_id){
			$is_read=$task->bookIsRead($this->uid, $book_id);		//判断用户是否读过此书
			if ($is_read) {
				$this->ajaxReturn('0','已经读过此书');
			}
			$this->data['book_id']=$book_id;
			$book_pages=$this->book->getBookField($book_id, 'pages');
			$this->data['pages']=$book_pages;
			$this->ajaxReturn();
		}else{
			$this->ajaxReturn('10030','书籍信息不正确');
		}
	}
	
	/**
	* 书籍详情页
	* @return:
	*/
	public function book_info() {
		$book_id=$this->_post('book_id');
		$this->check->checkId($book_id, 'book');
		
		$info=$this->book->get_book_info($book_id);
		
		$this->data['info']	=$info;
		$this->ajaxReturn();
	}
	/**
	* 保存书籍的页码，豆瓣的书籍无页码时，单独保存的接口
	* @date 2015-12-21
	* @return:
	*/
	public function savePages() {
		$book_id=$this->_post('book_id');
		$pages=$this->_post('pages');		//用户传的总页数
		$this->check->checkId($book_id);
		$this->check->checkId($pages);
		
		$book=new BookService();
		$book->saveBookPages($this->uid, $book_id, $pages);
		
		$this->ajaxReturn();
	}
	
	

}