function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
}

function selectOption(value) {
    const selectedOptionText = document.getElementById('selectedOptionText');
    selectedOptionText.textContent = value;

    // You can now use the selected value in your component or redirect as needed.
    // For example, you can store the value in a variable or update a component state.
    console.log('Selected Value:', value);

    // Close the dropdown after selection (optional)
    toggleDropdown();
}