using System;
using System.Collections.Generic;

// Sučelje za osnovni objekt - stavku narudžbe
public interface IStavkaNarudzbe
{
    string Opis();
    double Cijena();
}

// Konkretna implementacija osnovnog objekta - npr. pizza
public class OsnovnaStavka : IStavkaNarudzbe
{
    public string Opis()
    {
        return "Osnovna stavka";
    }

    public double Cijena()
    {
        return 10.00; // Osnovna cijena, primjer
    }
}

// Dekorator koji proširuje osnovnu stavku - npr. dodatak sira
public class DodatakSira : IStavkaNarudzbe
{
    private readonly IStavkaNarudzbe osnovnaStavka;

    public DodatakSira(IStavkaNarudzbe osnovnaStavka)
    {
        this.osnovnaStavka = osnovnaStavka;
    }

    public string Opis()
    {
        return osnovnaStavka.Opis() + ", Dodatak sira";
    }

    public double Cijena()
    {
        return osnovnaStavka.Cijena() + 3.00; // Cijena dodatka sira, primjer
    }
}

// Dekorator koji proširuje osnovnu stavku - npr. dodatak umaka
public class DodatakUmaka : IStavkaNarudzbe
{
    private readonly IStavkaNarudzbe osnovnaStavka;

    public DodatakUmaka(IStavkaNarudzbe osnovnaStavka)
    {
        this.osnovnaStavka = osnovnaStavka;
    }

    public string Opis()
    {
        return osnovnaStavka.Opis() + ", Dodatak umaka";
    }

    public double Cijena()
    {
        return osnovnaStavka.Cijena() + 2.00; // Cijena dodatka umaka, primjer
    }
}

class Program
{
    static void Main()
    {
        // Odabir osnovne stavke (npr. pizza)
        IStavkaNarudzbe narudzba = new OsnovnaStavka();

        // Odabir dodataka
        Console.WriteLine("Odaberi dodatak:");
        Console.WriteLine("1. Dodatak sira");
        Console.WriteLine("2. Dodatak umaka");

        // Unos odabira korisnika
        int odabir = Convert.ToInt32(Console.ReadLine());

        // Dodaj odabrani dodatak
        switch (odabir)
        {
            case 1:
                narudzba = new DodatakSira(narudzba);
                break;
            case 2:
                narudzba = new DodatakUmaka(narudzba);
                break;
            default:
                Console.WriteLine("Nevažeći odabir. Dodatak nije dodan.");
                break;
        }

        // Ispis opisa i ukupne cijene narudžbe
        Console.WriteLine($"Opis narudžbe: {narudzba.Opis()}");
        Console.WriteLine($"Ukupna cijena narudžbe: {narudzba.Cijena()} KM");
    }
}
