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
  var path = req.url
  var unprotected = ['/', '/login', '/cadastro']

  // Se não tiver sessão e tentar acessar uma rota protegida vai para /login
  if (!req.session.loggedOn && !unprotected.includes(path)) {
    req.session.loggedOn = false
    res.redirect('/')
  } else if (req.session.loggedOn && unprotected.includes(path)) {
    // Mas se tiver sessão e acessar rota desprotegida, joga pra /home
    res.redirect('/home')
  } else {
    next()
  }
})

// -------------------------------------------- //
// Definindo as rotas                           //
// -------------------------------------------- //
server.get('/login', function (req, res, next) {
  res.render('login')
})

server.post('/login', function (req, res, next) {
  const username = req.body.username
  const password = req.body.password
  authC.login(username, password, function (error, success, userData) {
    if (error) {
      console.log('Morri pela seguinte razão:')
      console.log(error)
    } else {
      if (success) {
        req.session.loggedOn = true
        req.session.userData = userData
        res.redirect('/home')
      } else {
        req.session.loggedOn = false
        req.session.userData = userData
        res.render('login', { error: 'Usuário ou senha incorretas.' })
      }
    }
  })
})

server.get('/home', function (req, res, next) {
  res.render('home', { userData: req.session.userData })
})

server.get('/logout', function (req, res, next) {
  req.session.destroy()
  res.redirect('/')
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
