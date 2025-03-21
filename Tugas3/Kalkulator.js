const operasi = {
    "+": (a, b) => a + b,
    "-": (a, b) => a - b,
    "*": (a, b) => a * b,
    "/": (a, b) => (b !== 0 ? a / b : "Error: Bagi 0!"),
    "%": (a, b) => (b !== 0 ? a % b : "Error: Mod 0!")
};

const hitung = (operator) => {
    const [num1, num2] = [
        parseFloat(document.getElementById("num1").value),
        parseFloat(document.getElementById("num2").value)
    ];

    if (isNaN(num1) || isNaN(num2)) {
        document.getElementById("hasil").textContent = "Masukkan angka!";
        return;
    }

    document.getElementById("hasil").textContent = operasi[operator](num1, num2);
};
