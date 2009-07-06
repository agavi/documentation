<?php

class Posts_PostModel extends BlogPostsBaseModel
{
	private $id;
	private $title;
	private $posted;
	private $categoryName;
	private $authorName;
	private $content;
	
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
	
	public function getCategoryName()
	{
		return $this->categoryName;
	}
	
	public function setCategoryName($name)
	{
		$this->categoryName = $name;
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
		$this->setId($data['id']);
		$this->setTitle($data['title']);
		$this->setPosted($data['posted']);
		$this->setCategoryName($data['category_name']);
		$this->setAuthorName($data['author_name']);
		$this->setContent($data['content']);
	}
	
	public function toArray()
	{
		$data = array();
		$data['id'] = $this->getId();
		$data['title'] = $this->getTitle();
		$data['posted'] = $this->getPosted();
		$data['category_name'] = $this->getCategoryName();
		$data['author_name'] = $this->getAuthorName();
		$data['content'] = $this->getContent();
		
		return $data;
	}
}

?>