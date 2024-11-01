// 11.1 API 호출 클릭 이벤트
const BTN_CALL = document.querySelector('#btn_call');
BTN_CALL.addEventListener('click', getList);

function getList() {
    const URL = document.querySelector('#url').value;
    console.log(URL);

// GET axios.get(url, option[])/체이닝 메소드/ php try catch 가 axios에서는 then catch/ 프론트에서 정해진 규칙 url를 보내면 백엔드에서 data를 만들어서 다시 프론트로 돌려준다. rESTful API
    axios.get(URL)
    .then(response => {
        // console.log(response);
        response.data.forEach(item => {
            // console.log(item.download_url);
            const NEW = document.createElement('img');
            NEW.setAttribute('src' , item.download_url);
            NEW.style.width= '200px';
            NEW.style.heigh= '200px';

            document.querySelector('.container').appendChild(NEW);
        });
    })
    .catch(error => {
        console.log(error);
    });
}