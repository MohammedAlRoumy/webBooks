<?php

namespace App\DataTables;

use App\Models\User;

use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query->orderBy('id', 'desc'))
            ->addIndexColumn()
            ->addColumn('image', 'admin.users.parts.image')
            ->addColumn('actions', 'admin.users.parts.actions')
            ->rawColumns(['actions','image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters([
                "language" => [
                    "emptyTable" => "ليست هناك بيانات متاحة في الجدول",
                    "loadingRecords" => "جارٍ التحميل...",
                    "processing" => "جارٍ التحميل...",
                    "lengthMenu" => "أظهر _MENU_ مدخلات",
                    "zeroRecords" => "لم يعثر على أية سجلات",
                    "info" => "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "infoEmpty" => "يعرض 0 إلى 0 من أصل 0 سجل",
                    "infoFiltered" => "(منتقاة من مجموع _MAX_ مُدخل)",
                    "search" => "ابحث:",
                    "paginate" => [
                        "first" => "الأول",
                        "previous" => "السابق",
                        "next" => "التالي",
                        "last" => "الأخير"
                    ],
                    "aria" => [
                        "sortAscending" => ": تفعيل لترتيب العمود تصاعدياً",
                        "sortDescending" => ": تفعيل لترتيب العمود تنازلياً"
                    ],
                    "select" => [
                        "rows" => [
                            "_" => "%d قيمة محددة",
                            "0" => "",
                            "1" => "1 قيمة محددة"
                        ],
                        "1" => "%d سطر محدد",
                        "_" => "%d أسطر محددة",
                        "cells" => [
                            "1" => "1 خلية محددة",
                            "_" => "%d خلايا محددة"
                        ],
                        "columns" => [
                            "1" => "1 عمود محدد",
                            "_" => "%d أعمدة محددة"
                        ]
                    ],
                    "buttons" => [
                        "print" => "طباعة",
                        "copyKeys" => "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                        "copySuccess" => [
                            "_" => "%d قيمة نسخت",
                            "1" => "1 قيمة نسخت"
                        ],
                        "pageLength" => [
                            "-1" => "اظهار الكل",
                            "_" => "إظهار %d أسطر"
                        ],
                        "collection" => "مجموعة",
                        "copy" => "نسخ",
                        "copyTitle" => "نسخ إلى الحافظة",
                        "csv" => "CSV",
                        "excel" => "Excel",
                        "pdf" => "PDF",
                        "colvis" => "إظهار الأعمدة",
                        "colvisRestore" => "إستعادة العرض"
                    ],
                    "autoFill" => [
                        "cancel" => "إلغاء",
                        "info" => "مثال عن الملئ التلقائي",
                        "fill" => "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                        "fillHorizontal" => "تعبئة الحقول أفقيًا",
                        "fillVertical" => "تعبئة الحقول عموديا"
                    ],
                    "searchBuilder" => [
                        "add" => "اضافة شرط",
                        "clearAll" => "ازالة الكل",
                        "condition" => "الشرط",
                        "data" => "المعلومة",
                        "logicAnd" => "و",
                        "logicOr" => "أو",
                        "title" => [
                            "منشئ البحث"
                        ],
                        "value" => "القيمة",
                        "conditions" => [
                            "date" => [
                                "after" => "بعد",
                                "before" => "قبل",
                                "between" => "بين",
                                "empty" => "فارغ",
                                "equals" => "تساوي",
                                "not" => "ليس",
                                "notBetween" => "ليست بين",
                                "notEmpty" => "ليست فارغة"
                            ],
                            "number" => [
                                "between" => "بين",
                                "empty" => "فارغة",
                                "equals" => "تساوي",
                                "gt" => "أكبر من",
                                "gte" => "أكبر وتساوي",
                                "lt" => "أقل من",
                                "lte" => "أقل وتساوي",
                                "not" => "ليست",
                                "notBetween" => "ليست بين",
                                "notEmpty" => "ليست فارغة"
                            ],
                            "string" => [
                                "contains" => "يحتوي",
                                "empty" => "فاغ",
                                "endsWith" => "ينتهي ب",
                                "equals" => "يساوي",
                                "not" => "ليست",
                                "notEmpty" => "ليست فارغة",
                                "startsWith" => " تبدأ بـ "
                            ]
                        ],
                        "button" => [
                            "0" => "فلاتر البحث",
                            "_" => "فلاتر البحث (%d)"
                        ],
                        "deleteTitle" => "حذف فلاتر"
                    ],
                    "searchPanes" => [
                        "clearMessage" => "ازالة الكل",
                        "collapse" => [
                            "0" => "بحث",
                            "_" => "بحث (%d)"
                        ],
                        "count" => "عدد",
                        "countFiltered" => "عدد المفلتر",
                        "loadMessage" => "جارِ التحميل ...",
                        "title" => "الفلاتر النشطة"
                    ],
                    "searchPlaceholder" => "ابحث ..."],
            ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'DT_RowIndex',
                'name' => 'DT_RowIndex',
                'title' => '#',
                'orderable' => false,
                'searchable' => false,
                'exportable' => false,
                'printable' => true,
            ],
            [
                "data" => "image",
                "name" => "image",
                "title" => "الصورة",
                'orderable' => false,
            ],
            [
                "data" => "name",
                "name" => "name",
                "title" => "الاسم",
                'orderable' => false,
            ],
            [
                "data" => "email",
                "name" => "email",
                "title" => "البريد الالكتروني",
                'orderable' => false,
            ],
            [
                "data" => "created_at",
                "name" => "created_at",
                "title" => "تاريخ الاضافة",
                'orderable' => false,
            ],
            [
                "data" => "actions",
                "name" => "actions",
                "title" => "العمليات",
                'orderable' => false,
                'searchable' => false,
                'printable' => false,
                'exportable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
