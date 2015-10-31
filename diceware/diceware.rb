require "json"

puts "How many words do you want?"
tot_words = gets.chomp
tot_dice = tot_words.to_i * 5
rand_nums = []
num_keys = []

wordlist = File.read('wordlist.json')
word_hash = JSON.parse(wordlist)
words = {}

tot_dice.times{ rand_nums << rand(1..6) }

rand_nums = rand_nums.each_slice(5).to_a

num_keys = rand_nums.map { |x| x.join() }
words = num_keys.map { |y| word_hash[y] }

#puts word_hash
#puts rand_nums.join()
puts rand_nums.to_s
puts num_keys.to_s
puts words.join(" ")


