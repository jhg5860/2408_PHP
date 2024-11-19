// 기본적인 module의 형태
// export default {
//  namespace :어디에 메소드를 쓸지 경로를 지정할떄 사용
//     namespaced :true,
//     state : () => ({
// 데이터가 저장되는 영역 , 키와 값을 기준으로 세팅해서 저장 키 : 값
//     }), 
//     mutations: {
//     state의 데이터를 수정할 수 있는 메소드들을 정의하는 영역 
//     },
//     actions: {

//     },
//     getters:  {
        
//     },
// }

export default {
    
    namespaced :true,  // 모듈화 된 스토어의 네임스페이스 활성화
    state : () => ({
        // 데이터가 저장되는 영역
        count: 0,
        products: [
            {productName: '바지', productPrice: 38000, productContent:'매우 아름다운 바지'},
            {productName: '티셔츠', productPrice: 25000, productContent:'매우 아름다운 티셔츠'},
            {productName: '양말', productPrice: 39999, productContent:'매우 비싼 양말'},
        ],
        detailProduct: {productName: '', productPrice: 0, productContent:''},  
    }),
    mutations: {
        // state의 데이터를 수정할 수 있는 메소드들을 정의하는 영역
        addCount(state) {
            state.count++;
        },
        setDetailProduct(state, item) {
            state.detailProduct = item;
        },
        // addProduct(state) {
        //  state.products= products.push([]);
        // }
             
    },
    actions: {
        // 비동기성 비즈니스 로직 함수를 정의하는 영역
    },
    getters: {
        // 추가처리를 하여 state의 데이터를 획득하기위한 함수들을 정의하는 영역
    },
}