<?php
function dbConnect()
{
	return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
}

function dbClose($connection)
{
	mysqli_close($connection);
}