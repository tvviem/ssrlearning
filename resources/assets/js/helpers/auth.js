export function loginProcess(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) => {    
                rej("Thông tin tài khoản chưa đúng");
            })
    })
}
export function logoutProcess() {
    return new Promise((res, rej) => {
        axios.post('/api/auth/logout')
            .then(()=> {
                res('Logout success! Token is invalidated.');
            })
            .catch((err) => {
                rej('Logout Error: ' + err);
            })
    });
}
export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if(!userStr) {
        return null;
    }
    return JSON.parse(userStr);
}