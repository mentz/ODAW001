-- Função Fibonacci recursiva (lenta)
function fib(i)
	if i <= 2 then
		return 1;
	else
		return fib(i-1) + fib(i-2);
	end;
end;

print("Fib(39) = " .. fib(39))

-- Iterar sobre string
local str = "String comum 123"

-- forma 1, usando contador no índice
for i = 1, #str do
	print(str:sub(i, i))
end

-- forma 2, usando regex
for ch in str:gmatch(".") do
	print(ch)
end