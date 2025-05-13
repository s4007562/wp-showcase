function navigateToPage(selectElement) {
    let selectedPage = selectElement.value; 
    if (selectedPage !== "") {
        window.location.href = selectedPage;
    }
}
