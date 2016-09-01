<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)
	                ->setCellValue('A1', '姓名')
	                ->setCellValue('B1', '年龄')
	                ->setCellValue('C1', '性别')
	                ->setCellValue('D1', '身份证号码')
	                ->setCellValue('E1', '国籍')
	                ->setCellValue('F1', '民族')
	                ->setCellValue('G1', '详细地址');
$i=2;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$i, $v['name'])
            ->setCellValue('B'.$i, 11)
            ->setCellValue('C'.$i, 22)
            ->setCellValue('D'.$i, 33)
            ->setCellValue('E'.$i, 44)
            ->setCellValue('F'.$i, 55)
            ->setCellValue('G'.$i, 66);

$objPHPExcel->getActiveSheet()->setTitle('student');//设置sheet标签的名称
$objPHPExcel->setActiveSheetIndex(0);
ob_end_clean();  //清空缓存 
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");
header('Content-Disposition:attachment;filename=报名表.xls');//设置文件的名称
header("Content-Transfer-Encoding:binary");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;