#include <stdio.h>

unsigned long long fib(int i) { return i <= 2 ? 1 : fib(i - 1) + fib(i - 2); }

int main(int argc, char *argv[]) {
  printf("%llu\n", fib(39));
  return 0;
}