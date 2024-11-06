(() => {
    document.querySelectorAll('.my-btn-detail').forEach(node => {
        node.addEventListener('click', e => {
            const URL = '/boards/detail?b_id=' + e.target.value;
            
            axios.get(URL)
            .then(response => {
                const TITLE = document.querySelector('#modalTitle');
                const CONTENT = document.querySelector('#modalContent');
                const IMG = document.querySelector('#modalImg');
                // 직접 해본거
                // const USER = document.querySelector('#modalUser');
                //
                const NAME =document.querySelector('#modalName');
                TITLE.textContent = response.data.b_title;
                CONTENT.textContent = response.data.b_content;
                // 직접 해본거
                // USER.textContent = response.data.u_name;
                // 
                NAME.textContent = response.data.u_name;
                IMG.setAttribute('src', response.data.b_img);
            })
            .catch(error => {
                console.log(error);
            });
        });
    });

    document.querySelector('#btnInsert').addEventListener('click', ()=> {
        window.location = '/boards/insert';
    });
})();