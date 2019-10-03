function fib(i)
	if i <= 2 then
		return 1
	else
		return fib(i-1) + fib(i-2)
	end
end

print(fib(39))