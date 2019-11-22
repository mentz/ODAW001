module.exports = {
  ENV: process.env.NODE_ENV || 'development',
  PORT: process.env.PORT || 5000,
  ADDR: process.env.ADDR || '0.0.0.0',
  DB: {
    ADDR: process.env.DB_ADDR || 'database',
    PORT: process.env.DB_PORT || 5432,
    USER: process.env.DB_USER,
    PASS: process.env.DB_PASS
  }
}
