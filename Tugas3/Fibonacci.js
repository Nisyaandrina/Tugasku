document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("tombolTampilkan").addEventListener("click", cetakFibonacci);
});

function fibonacci(n) {
    let fib = [1, 1];
    for (let i = 2; i < n; i++) {
        fib.push(fib[i - 1] + fib[i - 2]);
    }
    return fib;
}

function generateFibonacciTriangle(n) {
    let fibo = fibonacci(n * n);
    let index = 0;
    let segitiga = [];

    for (let i = 0; i < n; i++) {
        segitiga[i] = [];
        for (let j = 0; j <= i; j++) {
            segitiga[i][j] = fibo[index++];
        }
    }
    return segitiga;
}

function cetakFibonacci() {
    let barisInput = document.getElementById("baris");
    let hasil = document.getElementById("hasil");

    if (!barisInput) {
        console.error("Elemen input tidak ditemukan!");
        return;
    }

    let baris = parseInt(barisInput.value);
    if (isNaN(baris) || baris <= 0) {
        hasil.innerText = "Masukkan jumlah baris yang valid!";
        return;
    }

    let segitiga = generateFibonacciTriangle(baris);
    let output = "";

    for (let i = 0; i < segitiga.length; i++) {
        output += " ".repeat((baris - i) * 2);
        output += segitiga[i].join(" ") + "\n";
    }

    hasil.innerText = output;
}
