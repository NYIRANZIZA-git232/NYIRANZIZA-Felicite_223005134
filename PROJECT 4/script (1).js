document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const amountInput = document.getElementById("frwAmount");
    const rateInput = document.getElementById("currencyRate");
    const currencySelect = document.getElementById("selectCurrency");
    const resultDisplay = document.getElementById("resultDisplay");
    const resultBox = document.getElementById("result");

    // Map currency codes to symbols
    const currencySymbols = {
        USD: "$",
        EUR: "€",
        GBP: "£",
        JPY: "¥",
        ZAR: "R",
        NGN: "₦",
        EGP: "£",
        GHS: "₵",
        KES: "Sh",
        UGX: "Sh",
        TZS: "Sh",
        RWF: "FRw",
        BIF: "FBu",
        SCR: "₨",
        MUR: "₨",
        MAD: "MAD",
        DZD: "DA",
        SDG: "£"
    };

    // Function to validate amount input and change color
    function validateAmount() {
        let amount = parseFloat(amountInput.value);
        if (isNaN(amount) || amount <= 0) {
            amountInput.style.border = "2px solid red";
            amountInput.style.backgroundColor = "#ffe6e6";
            return false;
        } else {
            amountInput.style.border = "2px solid green";
            amountInput.style.backgroundColor = "#e6ffe6";
            return true;
        }
    }

    // Function to validate rate input and change color
    function validateRate() {
        let rate = parseFloat(rateInput.value);
        if (isNaN(rate) || rate <= 0) {
            rateInput.style.border = "2px solid red";
            rateInput.style.backgroundColor = "#ffe6e6";
            return false;
        } else {
            rateInput.style.border = "2px solid green";
            rateInput.style.backgroundColor = "#e6ffe6";
            return true;
        }
    }

    // Reset input colors when typing
    amountInput.addEventListener("input", () => {
        validateAmount();
        clearResult();
    });

    rateInput.addEventListener("input", () => {
        validateRate();
        clearResult();
    });

    // Update rate placeholder when currency changes
    currencySelect.addEventListener("change", () => {
        let currency = currencySelect.value.toUpperCase();
        rateInput.value = "";
        clearResult();
        // Reset rate input styling
        rateInput.style.border = "1px solid #ccc";
        rateInput.style.backgroundColor = "#fff";

        const defaultRates = {
            USD: 0.00077,
            EUR: 0.00071,
            GBP: 0.00061,
            JPY: 0.00067,
            AUD: 0.00071,
            CAD: 0.00068,
            ZAR: 0.0053,
            NGN: 0.0017,
            EGP: 0.032,
            GHS: 0.016,
            MAD: 0.0094,
            DZD: 0.12,
            SDG: 0.45,
            KES: 0.0075,
            UGX: 0.28,
            TZS: 1.6,
            RWF: 1,
            BIF: 1.1
        };
        if (defaultRates[currency]) {
            rateInput.placeholder = `e.g. ${defaultRates[currency]} (1 FRW = ${currency})`;
        } else {
            rateInput.placeholder = `Enter rate for ${currency}`;
        }
    });

    // Function to clear result
    function clearResult() {
        resultDisplay.innerHTML = "Result Here...";
        resultDisplay.style.color = "#fff";
        if (resultBox) {
            resultBox.style.backgroundColor = "#333";
        }
    }

    // Real-time validation on page load and typing
    amountInput.addEventListener("keyup", validateAmount);
    rateInput.addEventListener("keyup", validateRate);

    // Conversion logic
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        let amount = parseFloat(amountInput.value);
        let rate = parseFloat(rateInput.value);
        let currency = currencySelect.value.toUpperCase();

        // Run validations
        const isAmountValid = validateAmount();
        const isRateValid = validateRate();

        // Validation with color feedback
        if (!isAmountValid) {
            resultDisplay.innerHTML = "❌ Please enter a valid amount greater than 0";
            resultDisplay.style.color = "red";
            if (resultBox) resultBox.style.backgroundColor = "#fff";
            amountInput.focus();
            return;
        }

        if (!isRateValid) {
            resultDisplay.innerHTML = "❌ Please enter a valid exchange rate greater than 0";
            resultDisplay.style.color = "red";
            if (resultBox) resultBox.style.backgroundColor = "#fff";
            rateInput.focus();
            return;
        }

        // Perform conversion
        let converted = amount * rate;

        // Map symbol
        let symbol = currencySymbols[currency] || currency;

        // Display result with symbol
        resultDisplay.innerHTML = `${amount.toLocaleString()} FRW = <b>${symbol}${converted.toFixed(2)} ${currency}</b>`;
        resultDisplay.style.color = "#28a745";
        if (resultBox) resultBox.style.backgroundColor = "#fff";
    });

    // Optional: Add visual feedback on hover and focus
    amountInput.addEventListener("focus", () => {
        amountInput.style.outline = "none";
    });

    rateInput.addEventListener("focus", () => {
        rateInput.style.outline = "none";
    });

    // Initial validation check (optional)
    validateAmount();
    validateRate();
});