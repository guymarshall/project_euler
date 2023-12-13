<?php

require_once 'functions.php';

/**
 * 1 - Multiples of 3 or 5
 *
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
 * The sum of these multiples is 23.
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */
function multiplesOf3Or5(int $limit): int {
    $numbers = range(0, $limit - 1);
    $multiplesOf3 = array_filter($numbers, function($number) {
        return $number % 3 === 0;
    });
    $multiplesOf5 = array_filter($numbers, function($number) {
        return $number % 5 === 0;
    });
    $multiplesOf3And5 = array_unique(array_merge($multiplesOf3, $multiplesOf5));

    return array_sum($multiplesOf3And5);
}

/**
 * 2 - Even Fibonacci Numbers
 *
 * Each new term in the Fibonacci sequence is generated by adding the previous two terms.
 * By starting with 1 and 2, the first 10 terms will be:
 * 1, 2, 3, 5, 8, 13, 21, 34, 55, 89,...
 * By considering the terms in the Fibonacci sequence whose values do not exceed four million,
 * find the sum of the even-valued terms.
 */
function evenFibonacciNumbers(int $maximum): int {
    $generateFibonacciNumbers = function(int $maximum): array {
        $fibonacciNumbers = [];

        $first = 1;
        $second = 2;

        while ($first < $maximum) {
            $fibonacciNumbers[] = $first;
            $temp = $second;
            $second += $first;
            $first = $temp;
        }


        return $fibonacciNumbers;
    };

    $fibonacciNumbers = $generateFibonacciNumbers($maximum);
    return array_sum(array_filter($fibonacciNumbers, function($number) {
        return $number % 2 === 0;
    }));
}

/**
 * 3 - Largest Prime Factor
 *
 * The prime factors of 13195 are 5, 7, 13 and 29.
 * What is the largest prime factor of the number 600851475143?
 */
function largestPrimeFactor(int $number) {
    $generateFactors = function(int $inputNumber) {
        $ceilingRoot = ceil(sqrt($inputNumber));

        return array_filter(range(2, $ceilingRoot - 1), function($number) use($inputNumber) {
            return $inputNumber % $number === 0;
        });
    };

    $isPrime = function(int $inputNumber): bool {
        $ceilingRoot = ceil(sqrt($inputNumber));

        for ($i = 2; $i < $ceilingRoot - 1; $i++) {
            if ($inputNumber % $i === 0) {
                return false;
            }
        }

        return true;
    };

    $factors = $generateFactors($number);
    $primeFactors = array_filter($factors, $isPrime);
    return max($primeFactors);
}

/**
 * 4 - Largest Palindrome Product
 *
 * A palindromic number reads the same both ways. The largest palindrome made from the product of
 * two 2-digit numbers is 9009 = 91 x 99.
 * Find the largest palindrome made from the product of two 3-digit numbers.
 */
function largestPalindromeProduct(int $numberOfDigits): int {
    $isAPalindrome = function(string $inputString): bool {
        return $inputString === strrev($inputString);
    };

    $maximumNumber = pow(10, $numberOfDigits);
    $largestPalindrome = 0;

    for ($i = 0; $i < $maximumNumber; $i++) {
        for ($j = 0; $j < $maximumNumber; $j++) {
            $product = $i * $j;
            $isPalindromic = $isAPalindrome((string)$product);

            if ($isPalindromic && $product > $largestPalindrome) {
                $largestPalindrome = $product;
            }
        }
    }

    return $largestPalindrome;
}

/**
 * 5 - Smallest Multiple
 *
 * 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
 * What is the smallest positive number that is evenly divisible by all the numbers from 1 to 20?
 */
function smallestMultiple(int $limit): int {
    $isDivisibleBy = function(int $number, int $limit): bool {
        for ($i = 2; $i <= $limit; $i++) {
            if ($number % $i !== 0) {
                return false;
            }
        }

        return true;
    };

    $numberFound = false;
    $counter = 1;

    while (!$numberFound) {
        if ($isDivisibleBy($counter, $limit)) {
            break;
        } else {
            $counter++;
        }
    }

    return $counter;
}

/**
 * 6 - Sum Square Difference
 *
 * The sum of the squares of the first ten natural numbers is,
 * 1^2 + 2^2 + ... + 10^2 = 385
 * The square of the sum of the first ten natural numbers is,
 * (1 + 2 + ... 10)^2 = 55^2 = 3025
 * Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is
 * 3025 - 385 = 2640.
 * Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.
 */
function sumSquareDifference() {
//    let sum_of_squares: i32 = (1..101).map(|number| i32::pow(number, 2)).sum();
//    let square_of_sum: i32 = i32::pow((1..101).sum(), 2);
//    let difference: i32 = square_of_sum - sum_of_squares;
//    println!("Difference: {}", difference);
}

/**
 * 7 - 10001st Prime
 *
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see the 6th prime is 13.
 * What is the 10001st prime number?
 */
function find10001stPrime() {
//    let is_prime = |number: i32| -> bool {
//        let ceiling_root: i32 = f64::ceil(f64::sqrt(number as f64)) as i32;
//
//        (2..=ceiling_root).all(|i| number % i != 0)
//    };

//    let mut primes: Vec<i32> = vec![];
//    let mut prime_count: i32 = 0;
//    let mut number: i32 = 2;
//
//    while prime_count < 10000 {
//        let is_prime_number: bool = is_prime(number);
//
//        if is_prime_number {
//            primes.push(number);
//            prime_count += 1;
//        }
//
//        number += 1;
//    }
//
//    println!("10001st prime number: {}", primes.last().unwrap());
}

/**
 * 8 - Largest Product in a Series
 *
 * The four adjacent digits in the 1000-digit number that have the greatest product are 9 x 9 x 8 x 9 = 5832.
 * Find the thirteen adjacent digits in the 1000-digit number that have the greatest product.
 * What is the value of this product?
 */
function largestProductInASeries() {
//    let large_number_string: String =
//        fs::read_to_string("8_large_number.txt").expect("Failed to read file");
//
//    let mut largest_product: i64 = 0;
//    let number_of_digits: usize = 13;
//
//    let mut start_index: usize = 0;
//    let mut end_index: usize = start_index + number_of_digits - 1;
//
//    while end_index < large_number_string.len() {
//        let mut product: i64 = 1;
//
//        (start_index..=end_index).for_each(|i| {
//    let digit: i64 = large_number_string
//        .chars()
//        .nth(i)
//        .unwrap()
//        .to_digit(10)
//        .unwrap() as i64;
//
//            product *= digit;
//        });
//
//        if product > largest_product {
//            largest_product = product;
//        }
//
//        start_index += 1;
//        end_index += 1;
//    }
//
//    println!("Largest product: {}", largest_product);
}

/**
 * 9 - Special Pythagorean Triplet
 *
 * A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
 * a^2 + b^2 = c^2
 * For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.
 * There exists exactly one Pythagorean triplet for which a + b + c = 1000.
 * Find the product abc.
 */
function specialPythagoreanTriplet() {
//    'outer: for a in 1..1000 {
//        for b in 1..1000 {
//            for c in 1..1000 {
//                let is_pythagorean_triplet: bool =
//                    (i32::pow(a, 2)) + (i32::pow(b, 2)) == (i32::pow(c, 2));
//
//                if is_pythagorean_triplet {
//                    let total: i32 = a + b + c;
//
//                    if total == 1000 {
//                        println!("Product where total is 1000: {}", a * b * c);
//                        break 'outer;
//                    }
//                }
//            }
//        }
//    }
}

/**
 * 10 - Summation of Primes
 *
 * The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 * Find the sum of all the primes below two million.
 */
function summationOfPrimes() {
//    let is_prime = |number: i64| -> bool {
//        if number == 2 {
//            return true;
//        }
//
//        let ceiling_root: i64 = f64::ceil(f64::sqrt(number as f64)) as i64;
//
//        (2..=ceiling_root).all(|i| number % i != 0)
//    };

//    const START: i64 = 2;
//    const FINISH: i64 = 2_000_000;
//
//    let primes_below_limit: Vec<i64> = (START..FINISH).filter(|number| is_prime(*number)).collect();
//
//    println!("Sum: {}", primes_below_limit.iter().sum::<i64>());
}

consoleLog(multiplesOf3Or5(1_000));
consoleLog(evenFibonacciNumbers(4_000_000));
consoleLog(largestPrimeFactor(600_851_475_143));
consoleLog(largestPalindromeProduct(3));
consoleLog(smallestMultiple(20));

sumSquareDifference();
find10001stPrime(); // prefixed with find_ to stop Rust complaining
largestProductInASeries();
specialPythagoreanTriplet();
summationOfPrimes();
