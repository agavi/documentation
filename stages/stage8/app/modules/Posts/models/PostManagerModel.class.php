<?php

class Posts_PostManagerModel extends BlogPostsBaseModel
{
	public function retrieveById($id)
	{
		$sql = 'SELECT p.*, 
	a.screen_name AS author_name, 
	c.name AS category_name
FROM 
	posts p
	LEFT JOIN 
		admin_users a ON p.author_id = a.id
	LEFT JOIN 
		categories c ON p.category_id = c.id
WHERE 
	p.id = ?';
	
		$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
		$stmt->bindValue(1, $id, PDO::PARAM_INT);
		$stmt->execute();
	
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if (false != $result)
		{
			return $this->getContext()->getModel('Post', 'Posts', array($result));
		}
		
		return null;
	}
	
	public function retrieveLatest($limit = 5)
	{
		$sql = 'SELECT 
	p.*, 
	a.screen_name AS author_name, 
	c.name AS category_name
FROM 
	posts p
	LEFT JOIN 
		admin_users a ON p.author_id = a.id
	LEFT JOIN 
		categories c ON p.category_id = c.id
ORDER BY 
	posted DESC 
LIMIT ?';

		$stmt = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection()->prepare($sql);
		$stmt->bindValue(1, $limit, PDO::PARAM_INT);
		$stmt->execute();
		
	    $result = $stmt->fetchAll();
	
		foreach($result as $post) {
			$posts[] = $this->getContext()->getModel('Post', 'Posts', array($post));
		}
		
		return $posts;
	}
	
	public function storeNew(Posts_PostModel $post)
	{
		$con = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		
		$sql = 'INSERT INTO
	posts
(
	title,
	category_id,
	content,
	posted,
	author_id
)
VALUES
(
	?,
	?,
	?,
	NOW(),
	?
)';

		$stmt = $con->prepare($sql);
		
		$stmt->bindValue(1, $post->getTitle(), PDO::PARAM_STR);
		$stmt->bindValue(2, $post->getCategoryId(), PDO::PARAM_INT);
		$stmt->bindValue(3, $post->getContent(), PDO::PARAM_STR);
		$stmt->bindValue(4, $post->getAuthorId(), PDO::PARAM_INT);
		
		$stmt->execute();
		
		return $con->lastInsertId();
	}
	
	public function storeEdit(Posts_PostModel $post) 
	{
		$con = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		
		$sql = 'UPDATE posts SET title=?, category_id=?, content=? WHERE id=?';
		
		$stmt = $con->prepare($sql);
		
		$stmt->bindValue(1, $post->getTitle(), PDO::PARAM_STR);
		$stmt->bindValue(2, $post->getCategoryId(), PDO::PARAM_INT);
		$stmt->bindValue(3, $post->getContent(), PDO::PARAM_STR);
		$stmt->bindValue(4, $post->getId(), PDO::PARAM_INT);
		
		$stmt->execute();
		
		return $stmt->execute();
	}
	
}

?>