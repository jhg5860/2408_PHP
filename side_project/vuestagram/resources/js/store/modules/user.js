// import axios from "axios";
import axios from "../../axios";
import router from '../../router';

export default {
    namespaced : true,
    state : () => ({
        // accessToken : localStorage.getItem('accessTken') ? localStorage.getItem('accessToken'): '',
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations : {
        // setAccessToken(state, accessToken) {
        //     state.accessToken = accessToken;
        //     localStorage.setItem('accessToken', accessToken);
        // },
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
        setUserInfoBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', JSON.stringify(state.userInfo));
        },
    },
    actions : {
        // ------------
        // 인증관련
        // ------------
        /**
         * 로그인 처리
         * 
         * @param {*} context
         * @param {*} userInfo
         */
        // context :store 전체 /두번째 파라미터는  전달할값
        login(context,userInfo) {
            const url= './api/login';
            const data = JSON.stringify(userInfo);
            // const config = {
            //     headers : {
            //         'Content-Type' :'application/json'
            //     }
            // }

            // axios.post(url, data, config)
            axios.post(url, data)
            .then(response=> {
                // console.log(response);
                // 토큰 저장
                // context.commit('setAccessToken', response.data.accessToken);
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo',JSON.stringify(response.data.data));
                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                // 보드 리스트로 이동
                router.replace('/boards');

            })
            .catch(error => {
                let errorMsgList = [];
                const errorData = error.response.data;

                // console.log(error.response);
                if(error.response.status === 422) {
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
                    // errorMsgList.push('비밀번호가 틀렸습니다.');
                } else {
                    errorMsgList.push('예기치 못한 오류 발생');
                }

                alert(errorMsgList.join('\n'));
            });
        },
        /**
         * 로그아웃 처리
         * 
         * @param {*} context
         */
        logout(context) {
            const url = '/api/logout';
            const config = {
                headers : {
                    'Authorization' : 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }

            axios.post(url, null, config)
            .then(response => {
                alert('로그아웃 완료');
            })
            .catch(error => {
                alert('문제가 발생하여 로그아웃 처리');
            })
            .finally( ()=> {
                localStorage.clear(); // 로컬스토리지 비우기
                
                // state 초기화
                context.commit('setAuthFlg' , false);
                context.commit('setUserInfo' , {});

                router.replace('/login');
            });
        },
    },
    getters : {

    } 
}