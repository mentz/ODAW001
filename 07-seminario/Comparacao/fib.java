public class Fibonacci {
  static long fib(int i) {
    if (i <= 2) {
      return 1;
    } else {
      return fib(i - 1) + fib(i - 2);
    }
  }

  public static void main(String[] args) {
    System.out.println(Fibonacci.fib(39));
  }
}