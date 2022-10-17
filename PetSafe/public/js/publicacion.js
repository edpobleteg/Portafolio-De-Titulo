const select = document.getElementById('select'),
    list = document.getElementById('list'),
    selectText = document.getElementById('select-text'),
    options = document.getElementsByClassName('options'),
    input = document.getElementById('search-input'),
    favBtn = document.getElementsByClassName('add-favorite-btn'),
    favorite = document.getElementsByClassName('favorite'),
    noFavorite = document.getElementsByClassName('no-favorite');

for (let i = 0; i < favBtn.length; i++) {
    favBtn[i].addEventListener('click', function() {
        if (favorite[i].classList.contains('active')) {
            favorite[i].classList.remove('active');
            noFavorite[i].classList.add('active');
        } else {
            noFavorite[i].classList.remove('active');
            favorite[i].classList.add('active');
        }
    });
}
select.addEventListener('click', function() {
    list.classList.toggle('active');
});

for (item of options) {
    item.addEventListener('click', function() {
        selectText.innerHTML = this.innerHTML;
    });
}

for (let i = 0; i < options.length; i++) {
    options[i].addEventListener('click', function () {
        if (options[i].value === 1 || options[i].value === 2 || options[i].value === 3) {
            let form = document.getElementById('filter-form');
            document.getElementById('filter-input').value = options[i].value;
            form.submit();   
        }     
    });
};

