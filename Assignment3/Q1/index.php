<?php
// Step 1: Write 100 random numbers (1–10) to a file
$file = fopen("nums.txt", "w");
for ($i = 0; $i < 100; $i++) {
    fwrite($file, rand(1, 10) . " ");
}
fclose($file);

// Step 2: Read numbers from file
$data = file_get_contents("nums.txt");
$all = explode(" ", trim($data));
$count = [];

// Step 3: Read 10 at a time and count
for ($i = 0; $i < count($all); $i += 10) {
    $chunk = array_slice($all, $i, 10);
    foreach ($chunk as $n) {
        if ($n !== "") $count[$n] = ($count[$n] ?? 0) + 1;
    }
}

// Step 4: Print numbers with odd occurrences
echo "Odd occurring numbers: ";
foreach ($count as $num => $times) {
    if ($times % 2 != 0) echo "$num ";
}
?>
