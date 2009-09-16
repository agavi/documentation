<?php

class Posts_Post_EditInputView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$post = $rd->getParameter('post');

		$form = new AgaviParameterHolder(array(
			'post' => $post->getId(),
			'title' => $post->getTitle(),
			'content' => $post->getContent(),
			'category' => $post->getCategoryId(),
		));

		$this->setAttribute('_title', 'Edit Post');
		$this->setAttribute('post', $post);
		$this->getContext()->getRequest()->setAttribute('populate', array('edit' => $form), 'org.agavi.filter.FormPopulationFilter');
	}
}

?>