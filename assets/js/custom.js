
function showRegisterPopup() {
    document.getElementById('loginPopup').style.display = 'none';
    document.getElementById('registerPopup').style.display = 'block';
}

function showLoginPopup() {
    document.getElementById('registerPopup').style.display = 'none';
    document.getElementById('loginPopup').style.display = 'block';
}

function closeLoginPopup() {
    document.getElementById('loginPopup').style.display = 'none';
}

function closeRegisterPopup() {
    document.getElementById('registerPopup').style.display = 'none';
}
