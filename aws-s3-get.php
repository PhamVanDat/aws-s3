<?php
	// Installed the need packages with Composer by running:
	// $ composer require aws/aws-sdk-php
	
	$filePath = "https://example.com/test.png";
	require 'vendor/autoload.php';
	$bucketName = 'YOUR_BUCKET_NAME';
	$filePath = './YOUR_FILE_NAME.png';
	$keyName = basename($filePath);
	$IAM_KEY = 'YOUR_SECRET_ACCESS_KEY';
	$IAM_SECRET = 'YOUR_SECRET_ACCESS_CODE';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	// Set Amazon S3 Credentials
	$s3 = S3Client::factory(
		array(
			'credentials' => array(
				'key' => $IAM_KEY,
				'secret' => $IAM_SECRET
			),
			'version' => 'latest',
			'region'  => 'us-east-2'
		)
	);
  
	try {		
		// get object on S3
		$s3->getObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName
			)
		);
		
		// Display the object in the browser.
		header("Content-Type: {$result['ContentType']}");
		echo $result['Body'];
	} catch (S3Exception $e) {
		echo $e->getMessage() . PHP_EOL;
	} 
?>