<?php
/**
 * Created by Damien G. (damien.galicher@gmail.com)
 * Date: 08/08/2016 - Time: 18:10
 */

namespace Blog\Model;


interface PostCommandInterface
{

    public function insertPost(Post $post);
    public function updatePost(Post $post);
    public function deletePost(Post $post);
}