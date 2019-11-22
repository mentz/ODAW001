module.exports = {
  login
}

// Trocar isso aqui por acesso ao DB
function login(username, password, callback) {
  if (username == 'lucas' && password == 'mentz') {
    callback(null, true)
  } else {
    callback(null, false);
  }
}