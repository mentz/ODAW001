module.exports = {
  login
}

// Trocar isso aqui por acesso ao DB
function login (username, password, callback) {
  if (username === 'lucas' && password === 'mentz') {
    var userData = {
      nome: 'Lucas Litter Mentz',
      email: 'lucas@mentz.dev'
    }
    callback(null, true, userData)
  } else {
    callback(null, false)
  }
}
