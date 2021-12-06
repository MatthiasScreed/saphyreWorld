<?php

namespace App\DataTables;

trait DataTableTrait
{
    public function badge($text, $type, $margin = 0)
    {
        return '<span class="inline-block p-2 text-white bg-blue-600 rounded ' . $type . ' mr-' . $margin . 'leading-none  items-center">' . __($text) . '</span>';
    }
    public function button($route, $param, $type, $title, $icon, $name = '', $target = '_self')
    {
        return '<a
                    title="'. $title . '"
                    data-name="' . $name . '"
                    href="' . route($route, $param) . '"
                    class="px-3 btn btn-xs btn-' . $type . '"
                    target="' . $target . '">
                    <i class="far fa-' . $icon . '"></i>
                </a>';
    }
}
