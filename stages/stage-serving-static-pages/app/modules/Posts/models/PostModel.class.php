<?php

class Posts_PostModel extends BlogPostsBaseModel
{
	private $id;
	private $title;
	private $posted;
	private $categoryId;
	private $categoryName;
	private $authorId;
	private $authorName;
	private $content;
	
	protected $fields = array(
		'id' => 'Id',
		'title' => 'Title',
		'posted' => 'Posted',
		'category_id' => 'CategoryId',
		'category_name' => 'CategoryName',
		'author_id' => 'AuthorId',
		'author_name' => 'AuthorName',
		'content' => 'Content',
	);
	
	public function __construct(array $data = null)
	{
		if(!empty($data))
		{
			$this->fromArray($data);
		}
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function getPosted()
	{
		return $this->posted;
	}
	
	public function setPosted($posted)
	{
		$this->posted = $posted;
	}
	
	public function getCategoryId()
	{
		return $this->categoryId;
	}
	
	public function setCategoryId($id)
	{
		$this->categoryId = $id;
	}
	
	public function getCategoryName()
	{
		return $this->categoryName;
	}
	
	public function setCategoryName($name)
	{
		$this->categoryName = $name;
	}
	
	public function getAuthorId()
	{
		return $this->authorId;
	}
	
	public function setAuthorId($id)
	{
		$this->authorId = $id;
	}
	
	public function getAuthorName()
	{
		return $this->authorName;
	}
	
	public function setAuthorName($name)
	{
		$this->authorName = $name;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	public function fromArray(array $data)
	{
		foreach($data as $key => $value) {
			if(isset($this->fields[$key])) {
				$setter = 'set' . $this->fields[$key];
				$this->$setter($value);
			}
		}
	}
	
	public function toArray()
	{
		$data = array();

		foreach($this->fields as $key => $getter) {
			$getter = 'get'.$getter;
			$data[$key] = $this->$getter();
		}
		
		return $data;
	}
}

?>