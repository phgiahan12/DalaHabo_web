<?php

namespace App\Helpers;

class Helper
{
    public static function category($categories) {
        $html='';
        foreach ($categories as $key => $category) {
            $activeStyle = 'badge-success';
            $activeInfo = 'Hiển thị';

            if ($category->active == 0) {
                $activeStyle = 'badge-secondary';
                $activeInfo = 'Ẩn';
            }

            $html .= '
                <tr>
                    <td>'. $category->id .'</td>
                    <td>'. $category->name .'</td>
                    <td>'. $category->description .'</td>
                    <td class="text-center">
                        <span class="badge badge-pill ' . $activeStyle . '">' . $activeInfo .'</span>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="/admin/categories/edit/'. $category->id.'">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                            onClick="removeRow('. $category->id .', \'/admin/categories/destroy\')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            ';
                
        }

        return $html;
    }
}