puts "Dame número de ciclos:"
ciclos = gets.chomp.to_i
serie = []
fase = 0
fase_x = 1

ciclos.times {
	|x|
	y = x + 1
	if (fase_x == fase)
		z = y * -1
		fase = 0
		fase_x += 1
	else
		z = y
		fase += 1
	end
	serie << z
}

puts serie