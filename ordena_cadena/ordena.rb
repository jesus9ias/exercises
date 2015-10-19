puts 'Escribe una cadena'
cadena = gets.chomp

if cadena == ''
	cadena = 'kdAMkbCBJFjmuCIxiMcZPOJAOuKjjXWJeIXixwbnOzKcWlgtJzdatGHYzEUByOCElLwqtvfkVvSXYVtRnNbRmRmahPvpvaxjVheVEfRaRpuKZUOVNkszWuRwAVCuaTJJyfnThUwxYfbPuXxsjFMImcoZFCScuOlpxxxoyCrPWUkRUgAxPcJlcujlYgxVVkaYrwRKcSO'
end

frecuencias = Hash.new(0)
cadena_a = cadena.downcase.split('');
cadena_a.each {|x| frecuencias[x] += 1 }
frecuencias = frecuencias.sort_by { |x,y| y }
frecuencias.reverse!
resultado = ''

frecuencias.each_with_index do |x,a|
	frecuencias.each_with_index do |y,b|
		if x[0] < y[0] && x[1] == y[1]
			aux = frecuencias[a][0]
			frecuencias[a][0] = frecuencias[b][0]
			frecuencias[b][0] = aux
		end
	end
end

frecuencias.each {|q| resultado += q[0]}

puts resultado