<?php
/**
 * Created by Damien G. (damien.galicher@gmail.com)
 * Date: 08/08/2016 - Time: 18:19
 */

namespace Blog\Model;

use InvalidArgumentException;
use RuntimeException;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;

class ZendDbSqlRepository implements PostRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @var
     */
    private $hydrator;

    /**
     * @var
     */
    private $postPrototype;

    /**
     * ZendDbSqlRepository constructor.
     * @param AdapterInterface $db
     * @param HydratorInterface $hydrator
     * @param Post $postPrototype
     */
    public function __construct(
        AdapterInterface $db,
        HydratorInterface $hydrator,
        Post $postPrototype
    ) {
        $this->db               = $db;
        $this->hydrator         = $hydrator;
        $this->postPrototype    = $postPrototype;
    }

    /**
     * @return array|HydratingResultSet
     */
    public function findAllPosts()
    {
        $sql        = new Sql($this->db);
        $select     = $sql->select('posts');
        $stmt       = $sql->prepareStatementForSqlObject($select);
        $result     = $stmt->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->postPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    /**
     * @param $id
     * @return object
     */
    public function findPost($id)
    {
        $sql        = new Sql($this->db);
        $select     = $sql->select('posts');
        $select->where(['id = ?' => $id]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            throw new RuntimeException(sprintf(
                'Failed retrieving blog post with identifier "%s"; unknown database error.',
                $id
            ));
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->postPrototype);
        $resultSet->initialize($result);
        $post = $resultSet->current();

        if (! $post) {
            throw new InvalidArgumentException(sprintf(
                'Blog post with identifier "%s" not found.',
                $id
            ));
        }

        return $post;
    }

    /**
     * @param $name
     * @param $arguments
     */
    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }


}