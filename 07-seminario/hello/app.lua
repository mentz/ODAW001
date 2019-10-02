local lapis = require("lapis")
local app = lapis.Application()

app:enable("etlua")
app.layout = require("views.layout")

app:get("/", function(self)
  self.page_title = "O Título é Lava"
  self.coisas_que_gosto = {
    "Bananas",
    "Carros",
    "Dormir"
  }
  return { render = "index" }
end)

app:get("/args", function(self)
  return { render = "args" }
end)

return app
