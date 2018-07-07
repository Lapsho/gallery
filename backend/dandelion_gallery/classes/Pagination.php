<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 16.06.2018
 * Time: 21:08
 */

/** Generate pagination
 *
 * Class Pagination
 */
class Pagination extends Commons
{

    /** Generate pagination HTML
     *
     * @return string
     */
    public function renderPagination()
    {
        $paginationHtml = '';
        if ($this->getPageCount() > 1) {
            $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $this->getFirstPage() . "'>Go to first page</a></li>";
            if ($prevPage = $this->getPrevPage()) {
                $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $prevPage . "'>" . $prevPage . "</a></li>";
            }
            $paginationHtml .= "<li class='page-item active'><a class='page-link' href='#'>" . $this->getCurrentPage() . "</a></li>";
            if ($nextPage = $this->getNextPage()) {
                $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $nextPage . "'>" . $nextPage . "</a></li>";
            }
            $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $this->getLastPage() . "'>Go to last page</a></li>";
        }

        return $paginationHtml;
    }


    /** Return qty of pages
     *
     * @return float|int
     */
    protected function getPageCount()
    {
        $database = $this->connect();

        if($_SESSION['switch_collections'] == "all"){
            $result = $this->request($database, 'SELECT COUNT(id) FROM images');
        }elseif($_SESSION['switch_collections'] == "own"){
            $result = $this->request(
                $database,
                'SELECT COUNT(id) FROM images WHERE user_id = :auth',
                ['auth' => $_SESSION['auth']]
            );
        }elseif (in_array($_SESSION['switch_collections'],Commons::CATEGORY_LIST)){
            $result = $this->request(
                $database,
                'SELECT COUNT(id) FROM images WHERE category = :category',
                ['category' => $_SESSION['switch_collections']]
            );
        }

        return ceil($result->fetchColumn(0) / self::IMAGE_COUNT);
}


    /** Get last page number
     *
     * @return int
     */
    protected function getLastPage(): int
    {
        return $this->getPageCount();
    }


    /** Get first page, first page is 1
     *
     * @return int
     */
    protected function getFirstPage()
    {
        return 1;
    }


    /** Get next page number
     *
     * @return bool|int
     */
    protected function getNextPage()
    {
        if (isset($_REQUEST['p']) && $this->getPageCount() <= $_REQUEST['p']) {
            return false;
        } elseif (isset($_REQUEST['p'])) {
            return $_REQUEST['p'] + 1;
        } else {
            return 2;
        }
    }


    /** Get previous page number
     *
     * @return bool|int
     */
    protected function getPrevPage()
    {
        return isset($_REQUEST['p']) && $_REQUEST['p'] > 1 ? $_REQUEST['p'] - 1 : false;
    }


    /** Get current page number
     *
     * @return int
     */
    protected function getCurrentPage()
    {
        return isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
    }
}

