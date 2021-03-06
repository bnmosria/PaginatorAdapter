# Laminas to Doctrine Paginator-Adapter

## Description

A Laminas Framework Module formerly Zend Framework that provides pagination capabilities using doctrine and zend paginator

## Installation

You can install this package through Composer:

```json
composer require bnmosria/paginator-adapter
```

## Usage
On how to use a Laminas-Pagination refers to this page https://docs.laminas.dev/laminas-paginator/usage/.

In your entity repository you return a doctrine paginator with the requested result set, ex:

```php --PostRepository

    use Doctrine\ORM\Tools\Pagination\Paginator;
    
    ...
    
    /**
     * Should return a doctrine paginator with a result set of posts
     * @return Paginator
     */
    public function findPostsByPagination(int $offset = 0, int $limit = 5): Paginator
    {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder->select('p')
            ->from(Post::class, 'p')
            ->orderBy('p.id', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return new Paginator($queryBuilder->getQuery());
    }
```

Then you can use a Service to request the posts from your PostRepository, ex:

```php --PostService

    use Post\Repository\PostRepository;
    use PaginatorAdapter\Adapter\Factory\PaginatorFactory;
    use PaginatorAdapter\Adapter\PaginatorAdapter;
    use Laminas\Paginator\Paginator;
    
    ...
    
    /**
     * PostService constructor.
     *
     * @param PostRepository       $postRepository
     * @param PaginatorAdapter     $doctrinePaginatorAdapter
     * @param PaginatorFactory $paginatorFactory
     */
    public function __construct(
        PostRepository $postRepository,
        PaginatorAdapter $doctrinePaginatorAdapter,
        PaginatorFactory $paginatorFactory
    ) {
        $this->postRepository = $postRepository;
        $this->doctrinePaginatorAdapter = $doctrinePaginatorAdapter;
        $this->paginatorFactory = $paginatorFactory;
    }
    ...
    
    /**
     * Should return a zend paginator with a result set of posts
     *
     * @return Paginator
     */
    public function getPostsByPagination(int $offset = 0, int $limit = 5): Paginator
    {
        $postsPaginator = $this->postRepository
            ->findPostsByPagination($offset, $limit);

        $this->doctrinePaginatorAdapter
            ->setPaginator($postsPaginator);

        return $this->zendPaginatorFactory
            ->create($this->doctrinePaginatorAdapter);
    }
    
    ...
```
In the action in the Controller just call the service to get a Laminas-Paginator object with the result set.

```php --PostController

    use Post\Services\PostService;
    
    ...
    /**
     * PostController constructor.
     *
     * @param \Post\Services\PostService $postService
     */
    public function __construct(PostService $postService) 
    {
        $this->postService = $postService;
    }
    
    ...
    
    public function indexAction(): ViewModel
    {
        $page = $this->params()->fromRoute('page');
        $maxResult = $this->params()->fromRoute('max_per_page');

        $paginator = $this->postService
            ->getPostsByPagination($page, $maxResult);

        $paginator
            ->setCurrentPageNumber($page)
            ->setItemCountPerPage($maxResult);

        // Here you have a Laminas-Paginator, just use it in your 
        // view as documented here: https://docs.laminas.dev/laminas-paginator/usage/
        return new ViewModel(['posts' => $paginator]);
    }
```


