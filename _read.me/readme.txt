The demo imports lists of shops stored in a .csv file and displays them in a simple table and in a tree view driven by AJAX.

Running the demo requires PHP 5.3. It is written using Yii framework (http://www.yiiframework.com/). 
If you clone it from GitHub, put it into /demos subdirectory of the Yii framework.


Ready links working in Internet:
http://www.yii.dynamap.pl/demos/shops/index.php?r=shops/import - import of .csv file (login by admin/admin)
http://www.yii.dynamap.pl/demos/shops/index.php?r=shops/index - simple listing of the imported shops
http://www.yii.dynamap.pl/demos/shops/index.php?r=shops/tree - tree view where voivodships are parent nodes


Files in this directory:
- dump.sql contains dump of the table structure used in the demo application
- shops.csv contains sample data to be imported (the file is created in MS Excel and saved in CP1250 on purpose - the usual way clients do)



There is also a simple test unit written using PHPUnit in the '_unit_tests' folder. 
It tests proper charset conversion of data stored in .csv file. 

It can be run by: phpunit PATH/test-csv.php

Sample output without errors:
	Time: 0 seconds, Memory: 3
	OK (1 test, 1 assertion)

Sample output with errors (the line with 'stream_filter_prepend' commented out):
	Time: 1 second, Memory: 3.00Mb

	There was 1 failure:

	1) CSVTest::testCharsetEncoding
	First line of test-shops.csv has probably charset encoding broken.
	Failed asserting that two strings are equal.
	--- Expected
	+++ Actual
	@@ @@
	-f717f01690365c6733b04305e2ad8d7e
	+8772e77ecde5b3d6753d3421aeb8fa73

	test-csv.php:35

	FAILURES!
	Tests: 1, Assertions: 1, Failures: 1.

