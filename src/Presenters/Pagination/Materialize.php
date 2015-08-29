<?php

namespace Ohlandt\Presenters\Pagination;

use Illuminate\Pagination\BootstrapThreePresenter;

class Materialize extends BootstrapThreePresenter
{
    protected $color;

    /**
     * Convert the URL window into Materialize CSS HTML.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->hasPages())
        {
            return '';
        }

        return sprintf(
            '<div><ul class="pagination">%s %s %s</ul></div>',
            $this->getPreviousButton(),
            $this->getLinks(),
            $this->getNextButton()
        );
    }

    /**
     * Get HTML wrapper for disabled text.
     * Hide disabled arrows.
     *
     * @param  string $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        $hide = '';

        if ($text == "&laquo;") {
            $text = '<i class="material-icons">chevron_left</i>';
            $hide = 'hide';
        } elseif ($text == "&raquo;") {
            $text = '<i class="material-icons">chevron_right</i>';
            $hide = 'hide';
        }

        return '<li class="disabled ' . $hide . '">' . $text . '</li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        $color = '';

        if ($this->color) {
            $color = $this->color;
        }

        return '<li class="active ' . $color . '"><a>' . $text . '</a></li>';
    }

    /**
     * Get HTML wrapper for an available page link.
     *
     * @param  string      $url
     * @param  int         $page
     * @param  string|null $rel
     * @return string
     */
    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        if ($rel == "prev") {
            $page = '<i class="material-icons">chevron_left</i>';
        } elseif ($rel == "next") {
            $page = '<i class="material-icons">chevron_right</i>';
        }

        $rel = is_null($rel) ? '' : ' rel="' . $rel . '"';

        return '<li class="waves-effect"><a href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a></li>';
    }


    /**
     * Set the color to override the default red.
     * Example: 'lime'
     * Example: 'lime darken-2'
     *
     * @param  $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
