<?php

namespace App\Helpers;

class Helper
{
    public static function category($categories)
    {
        $html = '';
        foreach ($categories as $key => $category) {
            $html .= '
                <tr>
                    <td>' . $category->id . '</td>
                    <td>' . $category->name . '</td>
                    <td>' . $category->description . '</td>
                    <td class="text-center">' . self::active($category->active) . '</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="/admin/categories/edit/' . $category->id . '">
                            <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                            onClick="removeRow(' . $category->id . ', \'/admin/categories/destroy\')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }

    public static function active($active): string
    {
        return $active == 1 ? '<span class="badge badge-pill badge-success">Hiển thị</span>'
            : '<span class="badge badge-pill badge-secondary">Ẩn</span>';
    }
}
