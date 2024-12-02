export default {
    namespaced: true,
    state: () => ({
        accessToken: localStorage.getItem('accessToken')? localStorage.getItem('accessToken'): '',
    }),
    mutations: {
        setAccessToken(state,accessToken) {
            state.accessToken = accessToken;
            localStorage.setItem('accessToken', accessToken);
        },
    },
    actions: {
        // 인증관련

        /**
         * 로그인 처리
         * 
         * @param {*} context
         * @param {*} userInfo
         */
        login(context, userInfo) {
            const url ='/api/login';
            const data = JSON.stringify(userInfo);
            const config = {
                headers: {
                    'Content-Type' :'application/json'
                }
            }

            axios.post(url,data,config)
            .then(response=> {
                // 토큰 저장

            })
            .catch(error=> {
              let errorMsgList= [];
              const errorData = error.response.data;
              if(error.response.status === 422){
              // 유효성 체크 에러
                    if(errorData.data.account) {
                        errorMsgList.push(errorData.data.account[0]);
                    }
                    if(errorData.data.password) {
                        errorMsgList.push(errorData.data.password[0]);
                    }                    
                 } else if(error.response.status === 401) {
                    // 비밀번호 오류
                    errorMsgList.push(errorData.msg);
                 } else {
                    errorMsgList.push('예기치 못한 오류 발생');
                 }

                 alert(errorMsgList.join('\n'));

            });
        },
    },
    getters: {

    }
}