let fib =
    function(i) {
  if (i <= 2) return 1;
  return fib(i - 1) + fib(i - 2);
}

    console.log(fib(39))