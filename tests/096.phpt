--TEST--
sheet::addDataValidation()
--SKIPIF--
<?php if (!extension_loaded("excel")) || !in_array('addDataValidation', get_class_methods('ExcelSheet'))) print "skip"; ?>
--FILE--
<?php
	$book = new ExcelBook(null, null, true);

	$sheet1 = new ExcelSheet($book, 'sheet1');

	$strs = ['str1','str2','str3','str4','str5','str6','str7','str8','str9','str10'];
        $sheet1->writeCol('0', $strs, 1, null, \ExcelFormat::AS_NUMERIC_STRING);

	$sheet1->addDataValidation(\ExcelSheet::VALIDATION_TYPE_LIST, \ExcelSheet::VALIDATION_OP_EQUAL, 1, 1, 2, 2, "A2:A10");
	//$sheet1->addDataValidation(\ExcelSheet::VALIDATION_TYPE_DECIMAL, \ExcelSheet::VALIDATION_OP_BETWEEN, 1, 1, 2, 2, 1,2);
	var_dump(
		true
	);
	echo "OK\n";

?>
--EXPECT--
bool(true)
OK
