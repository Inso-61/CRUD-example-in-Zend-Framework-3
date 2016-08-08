<?php
/**
 * Created by Damien G. (damien.galicher@gmail.com)
 * Date: 08/08/2016 - Time: 17:49
 */

namespace Blog\Model;


interface PostRepositoryInterface
{

    public function findAllPosts();
    public function findPost($id);
}