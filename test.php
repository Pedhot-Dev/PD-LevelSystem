<?php

function calculateLevel($exp) {
    // Base exp untuk naik level
    $baseExp = 200;

    // Hitung level berdasarkan rumus
    $level = floor($exp / $baseExp) + 1;

    return $level;
}

function calculateExp($exp) {
    // Base exp untuk naik level
    $baseExp = 200;

    // Hitung sisa exp dari level
    $remainingExp = $exp % $baseExp;

    return $remainingExp;
}

// Contoh penggunaan
$playerExp = 350; // Gantilah dengan jumlah exp yang dimiliki oleh pemain
$playerLevel = calculateLevel($playerExp);
$remainingExp = calculateExp($playerExp);

echo "Player Exp: $playerExp\n";
echo "Player Level: $playerLevel\n";
echo "Remaining Exp for Level $playerLevel: $remainingExp\n";