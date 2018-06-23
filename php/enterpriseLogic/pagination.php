<?php

/** Return array with images
 *
 * @return mixed
 */
function getCollection()
{
    if (file_exists(IMAGE_RESOURCE_URL)) {
        $images = array_filter(scandir(IMAGE_RESOURCE_URL), function ($item) {
            return !is_dir(IMAGE_RESOURCE_URL . $item);
        });
        return $images;
    }
    return false;
}

/** Get last page number
 *
 * @param $collection
 * @return int
 */
function getLastPage($collection): int
{
    return getPageCount($collection);
}

/** Get first page, first page is 1
 *
 * @return int
 */
function getFirstPage()
{
    return 1;
}

/** Get next page number
 *
 * @param $collection
 * @return bool|int
 */
function getNextPage($collection)
{
    if (isset($_REQUEST['p']) && getPageCount($collection) < $_REQUEST['p']) {
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
function getPrevPage()
{
    return isset($_REQUEST['p']) && $_REQUEST['p'] > 1 ? $_REQUEST['p'] - 1 : false;
}

/** Get current page number
 *
 * @return int
 */
function getCurrentPage()
{
    return isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
}

/** Generate pagination HTML
 *
 * @param $collection
 * @return string
 */
function renderPagination($collection)
{
    $paginationHtml = '';
    if (count($collection) / 9 > 1) {
        $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . getFirstPage() . "'>Go to first page</a></li>";
        if ($prevPage = getPrevPage()) {
            $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $prevPage . "'>" . $prevPage . "</a></li>";
        }
        $paginationHtml .= "<li class='page-item active'><a class='page-link' href='#'>" . getCurrentPage() . "</a></li>";
        if ($nextPage = getNextPage($collection)) {
            $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . $nextPage . "'>" . $nextPage . "</a></li>";
        }
        $paginationHtml .= "<li class='page-item'><a class='page-link' href='/?p=" . getLastPage($collection) . "'>Go to last page</a></li>";
    }

    return $paginationHtml;
}

?>