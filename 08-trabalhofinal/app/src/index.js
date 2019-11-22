const express = require('express')
const session = require('express-session')
const config = require('./config')
const bodyParser = require('body-parser')
const authC = require('./controllers/auth')

const server = express()
server.set('views', '/root/app/src/views')
server.set('view engine', 'ejs')
server.use(bodyParser.json())
server.use(bodyParser.urlencoded({ extended: true }))
server.use(
  session({
    secret: config.SECRET,
    resave: true,
    saveUninitialized: false,
    cookie: {
      maxAge: 3600000
    }
  })
)

// -------------------------------------------- //
// Proteger as rotas com sessão                 //
// -------------------------------------------- //
server.use(function (req, res, next) {
  let path = req.url
  let unprotected = ['/', '/login', '/cadastro']

  // Se estiver em uma rota protegida e não tiver sessão ...
  if (!unprotected.includes(path) && !req.session.loggedOn) {
    // .. ganha uma sessão negada e ...
    req.session.loggedOn = false
    // .. é redirecionado para /login
    res.redirect('/')
  } else {
    next()
  }
})

// -------------------------------------------- //
// Definindo as rotas                           //
// -------------------------------------------- //
server.get('/login', function (req, res, next) {
  req.session.loggedOn = true
  res.render('login')
})

server.post('/login', function (req, res, next) {
  let username = req.body.username
  let password = req.body.password
  authC.login(username, password, function (error, success, userID) {
    if (error) {
      console.log('Morri pela seguinte razão:')
      console.log(error)
    } else {
      if (success) {
        req.session.loggedOn = true;
        req.session.username = userID;
        res.redirect('/home')
      } else {
        req.session.loggedOn = false;
        req.session.username = userID;
        res.render('login', { error: 'Usuário ou senha incorretas.' })
      }
    }
  })
})

server.get('/home', function (req, res, next) {
  res.render('home')
})

server.get('/logout', function (req, res, next) {
  req.session.destroy()
  res.send('Logout efetuado com sucesso!')
})

server.get('/', function (req, res, next) {
  if (req.session.loggedOn === true) {
    res.redirect('/home')
  } else {
    res.redirect('/login')
  }
})

// -------------------------------------------- //
// Iniciar servidor                             //
// -------------------------------------------- //
server.listen(config.PORT, function () {
  console.log('Server started on port ' + config.PORT + '.')
})
